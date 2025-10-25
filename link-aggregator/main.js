config = 'config.json';
document.addEventListener('DOMContentLoaded', function() {
    const links = document.getElementById('links');
    const socials = document.getElementById('socials');
    const username = document.getElementById('username');
    fetch(config)
        .then(response => response.json())
        .then(data => {
            document.title = `@${data.username}`;
            if (data.icon && data.icon.trim() !== "") {
                let favicon = document.querySelector('link[rel="icon"]');
                if (!favicon) {
                    favicon = document.createElement('link');
                    favicon.rel = 'icon';
                    document.head.appendChild(favicon);
                }
                favicon.href = data.icon;
            }
            document.body.classList.toggle(`la-${data.theme}`);
            //document.getElementById('title').textContent = data.name;
            if(data.profile != '')
            {
                username.innerHTML = `<img src="${data.profile}" alt="" id="profile" srcset=""><br>@${data.username}`;
            }
            else
            {
                username.innerHTML = `@${data.username}`;
            }
            socials.classList.add(`la-${data.theme}`);
            for (const [name, url] of Object.entries(data.socials)) {
                const social = document.createElement('a');
                social.href = url;
                social.target = '_blank';
                social.title = name;
                social.textContent = name;
                social.className = 'la-btn';
                socials.appendChild(social);
            }
            links.classList.add(`la-${data.theme}`);
            for (const [key, value] of Object.entries(data.links)) {
                const link = document.createElement('a');
                link.href = value.url;
                link.target = '_blank';
                //link.textContent = value.name;
                //link.style = 'display: flex;flex-direction: column;align-items: center;text-align: center;width: 100%;';
                link.className = 'links';
                if(value.img && value.img.trim() !== "") {
                    link.innerHTML = `<img src="${value.img}" alt="${value.name}" class="link-img" style="display: block;margin-bottom: 10px;height: 50vh;max-width: 100%;">`;
                    //const img = document.createElement('img');
                    //img.src = value.img;
                    //img.alt = value.name;
                    //img.className = 'link-img';
                    //img.style = 'display: block;margin-bottom: 10px;height: 50vh;width: auto;';
                    //link.appendChild(img);
                }
                const textspan = document.createElement('span');
                textspan.style = 'text-decoration:none;';
                if(value.icon && value.icon.trim() !== "") {
                    textspan.innerHTML = '<img src="'+value.icon+'" alt="'+value.name+'" style="height:10vh;"> '+value.name;
                }
                else
                {
                    textspan.textContent = value.name;
                }
                link.appendChild(textspan);

                links.appendChild(link);
            }
            //document.getElementById('footer');
        })
        .catch(error => {
            console.error('Error fetching config:', error);
        });
});