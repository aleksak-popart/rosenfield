import slider from "./components/slider";
import navigation from "./components/navigation";

declare global {
  interface Window {
    globals: {
      ajax_url: string;
      home_url: string;
    };
    loadingPolyfills: boolean;
    loadedPolyfills: boolean;
  }
}

window.globals = JSON.parse(document.body.dataset.globals);

const init = () => {
  slider();
  navigation();
};

if (window.loadingPolyfills) {
  // polyfills are required
  const script = document.querySelector("#myPolyfylls")! as HTMLScriptElement;
  if (window.loadedPolyfills) {
    // polyfills are already loaded
    init();
  } else {
    // wait for polyfills to load
    script.onload = () => {
      init();
    };
  }
} else {
  // polyfills are not required
  init();
}
