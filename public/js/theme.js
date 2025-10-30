
(function(){
  const html = document.documentElement;
  const saved = (document.cookie.match(/(?:^|; )cosmiko_theme=([^;]+)/)||[])[1];
  if(saved){ html.setAttribute('data-theme', decodeURIComponent(saved)); }

  const setCookie = (k,v) => {
    document.cookie = `${k}=${encodeURIComponent(v)}; path=/; max-age=${60*60*24*365}`;
  };

  // Toggle theme
  const icon = document.getElementById('themeIcon');
  const btn = document.getElementById('themeToggle');
  if(btn){
    btn.addEventListener('click', () => {
      const current = html.getAttribute('data-theme') || 'dark';
      const next = current === 'dark' ? 'light' : 'dark';
      html.setAttribute('data-theme', next);
      setCookie('cosmiko_theme', next);
      if(icon){
        icon.classList.toggle('bi-brightness-high');
        icon.classList.toggle('bi-moon-stars');
      }
    });
  }

  // Sidebar collapse
  const sidebar = document.getElementById('sidebar');
  const toggle = document.getElementById('sidebarToggle');
  if(toggle && sidebar){
    toggle.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
      document.querySelector('.app-main')?.classList.toggle('collapsed-push');
    });
  }
})();
