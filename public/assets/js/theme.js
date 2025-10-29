(function(){
  const KEY='cosmiko.theme'; const html=document.documentElement;
  const saved=localStorage.getItem(KEY); if(saved){ html.setAttribute('data-theme', saved); }
  document.addEventListener('click', (e)=>{
    if(e.target && e.target.id==='themeToggle'){
      const next=(html.getAttribute('data-theme')||'dark')==='dark'?'light':'dark';
      html.setAttribute('data-theme', next); localStorage.setItem(KEY,next);
    }
  });
})();
