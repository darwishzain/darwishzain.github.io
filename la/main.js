config = 'config.json';
async function init(){
    const error = document.getElementById('error');
    const links = document.getElementById('links');
    const socials = document.getElementById('socials');
    const profile = document.getElementById('profile');
    const params = new URLSearchParams(window.location.search);
    const username = params.get('u');
    try{
        const response = await fetch(`${username}.json`);
        if(!response.ok)throw new Error('404 Profile Not Found');
        const data = await response.json();
        if(data !== "")
        {
            document.title = data.username;
            document.body.className = `bg-${data.theme}`;
            profile.classList.add(`la-${data.theme}`);
            socials.className = `la-${data.theme}`
            links.className = `la-${data.theme}`
            if(data.icon && data.icon.trim !== ""){
                let favicon = document.querySelector('link[rel="icon"]');
                if (!favicon) {
                    favicon = document.createElement('link');
                    favicon.rel = 'icon';
                    document.head.appendChild(favicon);
                }
                favicon.href = data.icon;
            }
            if(data.profile && data.profile.trim !== ""){
                const profileimg = document.createElement('img');
                profileimg.src = data.profile;
                profile.appendChild(profileimg);
            }
            const username = document.createElement('p');
            username.textContent = `@${data.username}`;
            profile.appendChild(username);
            const bio = document.createElement('p');
            bio.className = 'bio';
            bio.textContent = `${data.bio}`;
            profile.appendChild(bio);
            for (const [name, url] of Object.entries(data.socials)) {
                const social = document.createElement('a');
                label = name.toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
                social.href = url;
                social.target = '_blank';
                social.title = label;
                social.textContent = label;
                social.className = 'la-btn la-social';
                socials.appendChild(social);
            }
            for (const [key, value] of Object.entries(data.links)) {
                const link = document.createElement('a');
                link.href = value.url;
                link.target = '_blank';
                link.textContent = value.name;
                link.className = 'la-btn la-link';
                links.appendChild(link);
            }
        }

    }
    catch(err){
        error.innerHTML = `${err.message}`;
        document.title = `${err.message}`;
    }
}
init();
/* document.addEventListener('DOMContentLoaded', function() {
    const links = document.getElementById('links');
    const socials = document.getElementById('socials');
    const username = document.getElementById('username');
    fetch(config)
        .then(response => response.json())
        .then(data => {
            if(data.profile != ''){username.innerHTML = `<img src="${data.profile}" alt="" id="profile" srcset=""><br>@${data.username}`;}
            else{username.innerHTML = `@${data.username}`;}
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
}); */