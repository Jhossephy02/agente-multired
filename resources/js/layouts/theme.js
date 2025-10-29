
// resources/js/layouts/theme.js
(function(){
  const root = document.documentElement;
  const savedDark = localStorage.getItem('darkMode');
  const savedPalette = localStorage.getItem('palette') || 'astropay';

  if (savedDark === 'true') document.documentElement.classList.add('dark');
  root.setAttribute('data-palette', savedPalette);

  // listeners
  window.toggleDarkMode = function(){
    const isDark = document.documentElement.classList.toggle('dark');
    localStorage.setItem('darkMode', isDark ? 'true' : 'false');
  };

  window.setPalette = function(p){
    root.setAttribute('data-palette', p);
    localStorage.setItem('palette', p);
  };

  // init select if exists
  const sel = document.getElementById('paletteSelect');
  if (sel){
    sel.value = savedPalette;
    sel.addEventListener('change', e => setPalette(e.target.value));
  }
})();
