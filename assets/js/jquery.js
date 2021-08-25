document.addEventListener("scroll", (e) => {
  let scroll_pos = window.scrollY;
  const head = document.querySelector("header");

  console.log(scroll_pos);
  scroll_pos = scroll_pos * -3 * 0.5;

  head.style.backgroundPosition = "0px " + scroll_pos + "px";
});
