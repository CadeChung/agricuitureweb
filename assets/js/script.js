const body = document.querySelector("body"),
      sidebar = body.querySelector("nav"),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".moon-text");

toggle.addEventListener("click", () =>{
  sidebar.classList.toggle("close");
});

searchBtn.addEventListener("click", () =>{
  sidebar.classList.remove("close");
});

modeSwitch.addEventListener("click", () =>{
  body.classList.toggle("dark");

  if(body.classList.contains("dark")){
    modeText.innerText = "切換白色模板";
  } else{
    modeText.innerText = "切換黑色模板";
    
  }
});