(function(){
  const html = document.documentElement;
  const btn = document.getElementById('themeToggle');
  const saved = localStorage.getItem('cosmiko.theme');
  if(saved === 'light'){ html.classList.remove('dark'); }
  if(saved === 'dark'){ html.classList.add('dark'); }
  if(btn){
    btn.addEventListener('click', ()=>{
      html.classList.toggle('dark');
      localStorage.setItem('cosmiko.theme', html.classList.contains('dark') ? 'dark':'light');
    });
  }
})();