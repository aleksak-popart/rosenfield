const navigation = (): void => {
  const btn = document.querySelector(".js-hamburger")! as HTMLDivElement;
  const nav = document.querySelector(".js-navigation")! as HTMLElement;
  const header = document.querySelector(".js-header")! as HTMLElement;

  const menuToggle = () => {
    btn.classList.toggle("open");
    nav.classList.toggle("open");
    header.classList.toggle("open");
    document.documentElement.classList.toggle("open");
  };
  btn.addEventListener("click", menuToggle);

  let prevPosY = window.scrollY;
  if (window.scrollY > 10) {
    header.classList.add("not-top");
  }

  addEventListener("scroll", () => {
    const posY = window.scrollY;
    if (posY < 10) {
      header.classList.remove("not-top");
    } else {
      header.classList.add("not-top");
    }
    if (posY <= prevPosY || posY <= 0) {
      header.classList.remove("hide");
    } else {
      header.classList.add("hide");
    }
    prevPosY = posY;
  });
};

export default navigation;
