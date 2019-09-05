function toggleMenu() {
  let menu = 'menu';
  let nomenu = 'unem';
  let shouldBeActive = document.getElementById('site-header-categories').className.includes('menu') ? nomenu : menu;
  document.getElementById('site-header-categories').className = "container site-header-categories " + shouldBeActive;
  // document.getElementById('site-header').className = "site-header " + shouldBeActive;
  // document.getElementById('site-header-navigation-button').className = "site-header-navigation-button " + shouldBeActive;
}