const searchbar = document.querySelector(".users .search input"),
  searchBtn = document.querySelector(".users .search button");

searchBtn.onclick = () => {
  searchbar.classList.toggle("active");
  searchbar.focus();
  searchBtn.classList.toggle("active");
}