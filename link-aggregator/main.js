config = 'config.json';
document.addEventListener('DOMContentLoaded', function() {
    const links = document.getElementById('links');
    const socials = document.getElementById('socials');
    fetch(config)
        .then(response => response.json())
        .then(data => {
            document.title = '@'+data.username;
            document.body.style.background = data.backgroundcolor;
            document.getElementById('title').textContent = data.name;
            document.getElementById('username').textContent = '@'+data.username;
            if (data.icon && data.icon.trim() !== "") {
                let favicon = document.querySelector('link[rel="icon"]');
                if (!favicon) {
                    favicon = document.createElement('link');
                    favicon.rel = 'icon';
                    document.head.appendChild(favicon);
                }
                favicon.href = data.icon;
            }


            for (const [name, url] of Object.entries(data.links)) {
                const link = document.createElement('a');
                link.href = url;
                link.target = '_blank';
                link.title = name;
                link.textContent = name;
                link.className = 'btn btn-primary w-100';
                link.style.maxWidth = '400px';
                links.appendChild(link);
            }
            for (const [name, url] of Object.entries(data.socials)) {
                const social = document.createElement('a');
                social.href = url;
                social.target = '_blank';
                social.title = name;
                social.textContent = name.charAt(0).toUpperCase() + name.slice(1);
                social.className = 'btn btn-outline-secondary btn-light btn-sm';
                socials.appendChild(social);
            }
            document.getElementById('footer');
        })
        .catch(error => {
            console.error('Error fetching config:', error);
        });
});