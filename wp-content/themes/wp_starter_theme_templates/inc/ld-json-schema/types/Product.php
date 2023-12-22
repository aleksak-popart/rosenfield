<?php

class Product extends Schema
{
	public function __construct($attributes)
	{
		parent::__construct($attributes, [
			'url' => Schema::currentUrl(),
      'aggregateRating' => $this->get_aggregate_rating(),
      'image' => get_the_post_thumbnail_url(),
      'brand' => get_field("schema_brand"),
      'reviews' => $this->get_reviews()
		]);
	}

  private function get_aggregate_rating() {
    $aggregateRating;
    $aggregateRating["@type"] = "AggregateRating";
    $aggregateRating["ratingValue"] = get_field("schema_rating_value");
    $aggregateRating["bestRating"] = "5";
    $aggregateRating["worstRating"] = "1";
    $aggregateRating["reviewCount"] = strval(count(get_field("schema_reviews")));

		uksort($aggregateRating, function ($a, $b) {
			return $this->sequenceOf($a) - $this->sequenceOf($b);
		});

    return $aggregateRating;
  }
  
  private function get_rating($ratingValue) {
    $aggregateRating;
    $aggregateRating["@type"] = "Rating";
    $aggregateRating["ratingValue"] = $ratingValue;
    $aggregateRating["bestRating"] = "5";
    $aggregateRating["worstRating"] = "1";

		uksort($aggregateRating, function ($a, $b) {
			return $this->sequenceOf($a) - $this->sequenceOf($b);
		});

    return $aggregateRating;
  }

  private function get_reviews() {
    $reviews = [];

    if( have_rows('schema_reviews') ) {
        while ( have_rows('schema_reviews') ) {
            the_row();

            $review;
            $review["@type"] = "Review";
            $review["author"] = get_sub_field("author");
            $review["datePublished"] = get_sub_field("date_published");
            $review["reviewBody"] = get_sub_field("review_body");
            $review["reviewRating"] = $this->get_rating(get_sub_field("review_rating_value"));

            array_push($reviews, $review); 
        } 
    } 

    return $reviews;
  }
}