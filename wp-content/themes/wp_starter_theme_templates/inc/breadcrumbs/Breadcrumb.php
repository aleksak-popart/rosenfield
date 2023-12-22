<?php

class Breadcrumb {

	protected $wrapper = '<div id="crumbs" class="breadcrumbs">%s</div>';

	protected $delimiter = ' <span class="delimiter">/</span> ';

	protected $crumbs = [];

	protected $wp_query;

	public function __construct()
	{
		global $wp_query;

		$this->wp_query = $wp_query;
	}

	public function home()
	{
		$page = get_post(get_option('page_on_front'));
		$this->crumb(get_permalink($page), $page->post_title);
		return $this;
	}

	public function post($post)
	{
		if (is_numeric($post)) {
			return $this->postById($post);
		}

		return $this->postByIdAndType($post->ID, $post->post_type);
	}

	public function term($term)
	{
		if (is_numeric($term)) {
			return $this->termById($term);
		}

		return $this->termById($term->term_id);
	}

	public function parents($item = null)
	{
		if (empty($item)) {
			$item = $this->wp_query->get_queried_object();
		}

		if ($item instanceof WP_Post) {
			return $this->postParents($item);
		} else if ($item instanceof WP_Term) {
			return $this->termParents($item);
		}

		return $this;
	}

	public function crumb($link, $text)
	{
		$this->crumbs[] = sprintf('<a href="%1$s">%2$s</a>', $link, $text);
		return $this;
	}

	public function unlinkedCrumb($text)
	{
		$this->crumbs[] = sprintf('<span class="current">%1$s</span>', $text);
		return $this;
	}

	public function current()
	{
		$item = $this->wp_query->get_queried_object();

		if ($item instanceof WP_Post) {
			return $this->unlinkedCrumb($item->post_title);
		} else if ($item instanceof WP_Term) {
			return $this->unlinkedCrumb($item->name);
		}

		return $this;
	}

	public function pageByTitle($title)
	{
		$page = get_page_by_title($title);
		return $this->postByIdAndType($page->ID, $page->post_type);
	}

	protected function postById($id)
	{
		$post = get_post($id);
		return $this->postByIdAndType($post->id, $post->post_type);
	}

	protected function postByIdAndType($id, $post_type)
	{
		$filtered_id = apply_filters('wpml_object_id', $id, $post_type, TRUE);
		return $this->postCrumb(get_post($filtered_id));
	}

	protected function termById($id)
	{
		$term = get_term($id);
		return $this->termByIdAndType($term->term_id, $term->taxonomy);
	}

	protected function termByIdAndType($id, $taxonomy)
	{
		$filtered_id = apply_filters('wpml_object_id', $id, $taxonomy, TRUE);
		return $this->termCrumb(get_term($filtered_id));
	}

	protected function termCrumb($term)
	{
		return $this->crumb(get_term_link($term), $term->name);
	}

	protected function postCrumb($post)
	{
		return $this->crumb(get_permalink($post), $post->post_title);
	}

	protected function postParents($post)
	{
		if (!empty($post->post_parent)) {
			$parent = get_post($post->post_parent);

			$this->postParents($parent);
			$this->postByIdAndType($parent->ID, $parent->post_type);
		}

		return $this;
	}

	protected function termParents($term)
	{
		if (!empty($term->parent)) {
			$parent = get_term($term->parent);

			$this->termParents($parent);
			$this->crumb(get_term_link($parent), $parent->name);
		}

		return $this;
	}

	public function __toString()
	{
		return sprintf($this->wrapper, implode($this->delimiter, $this->crumbs));
	}
}
