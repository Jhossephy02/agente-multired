(function(){
  const root = document.documentElement;
  const body = document.body;
  const key = 'cosmiko_theme';

  function apply(theme){
    body.classList.remove('theme-dark','theme-light');
    body.classList.add(theme === 'light' ? 'theme-light' : 'theme-dark');
    root.setAttribute('data-theme', theme);
    const toggles = document.querySelectorAll('#themeToggle');
    toggles.forEach(btn => btn.textContent = theme === 'light' ? 'Cambiar a modo oscuro' : 'Cambiar a modo claro');
  }

  function current(){
    return localStorage.getItem(key) || (window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark');
  }

  function toggle(){
    const next = current() === 'light' ? 'dark' : 'light';
    localStorage.setItem(key, next);
    apply(next);
  }

  window.addEventListener('DOMContentLoaded', () => {
    apply(current());
    document.addEventListener('click', (e)=>{
      if(e.target && e.target.id === 'themeToggle'){ e.preventDefault(); toggle(); }
    });
  });
})();
