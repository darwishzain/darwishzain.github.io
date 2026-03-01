async function initpage(){
    const error = document.getElementById('error');
    const query = window.location.search;
    if(query.startsWith('?@'))
    {
        username = query.slice(2);
        try{
            const userresponse = await fetch(`${username}.user`);
            const userdata = await userresponse.json();
            if(userdata !== "")
            {
                //* THEME
                const activetheme = userdata.theme || 'default';
                document.body.setAttribute('th-theme', activetheme);
                let favicon = document.querySelector('link[rel="icon"]');
                //* FAVICON
                if(userdata.profile.icon && userdata.profile.icon.trim !== ""){
                    favicon.href = userdata.profile.icon;
                }
                else{
                    favicon.href = 'assets/default-icon.png';
                }
                //* PROFILE
                const profileimg = document.createElement('img');
                if(userdata.profile.img && userdata.profile.img.trim !== ""){
                    profileimg.src = userdata.profile.img;
                }
                else{
                    profileimg.src = 'assets/default-profile.png';
                }
                profileimg.classList.add('rounded-circle');
                document.getElementById('profile').appendChild(profileimg);
                if(userdata.profile.username && userdata.profile.username.trim !== ""){
                    if(userdata.profile.name && userdata.profile.name.trim !== ""){
                        document.title = userdata.profile.name;
                    }
                    else{
                        document.title = '@'+userdata.profile.username;
                    }
                    const username = document.createElement('h3');
                    username.textContent = '@'+userdata.profile.username;
                    document.getElementById('profile').appendChild(username);
                }
                if(userdata.profile.bio && userdata.profile.bio.trim !== ""){
                    const bio = document.createElement('p');
                    bio.classList.add('w-50','mx-auto','opacity-75');
                    bio.textContent = `${userdata.profile.bio}`;
                    document.getElementById('profile').appendChild(bio);
                }
                userdata.order.forEach(section => {
                    sectiondata = userdata.sections[section];
                    switch(section){
                        case 'socials':
                            rendersocials(sectiondata);
                            break;
                        case 'featured':
                            break;
                        case 'products':
                            renderproducts(sectiondata);
                            break;
                        case 'links':
                            renderlinks(sectiondata);
                            break;
                        default:
                            break;
                    }
                });
            }
        }
        catch(err){
            error.innerHTML = `User Data Not Found`;
            document.title = `User Data Not Found`;
            return;
        }
    }
    else
    {
        error.innerHTML = `Invalid URL Format`;
        document.title = `Invalid URL Format`;
        return;
    }

}
function rendersocials(socials){
    const container = document.createElement('div');
    container.id = 'socials';
    for (const [id, social] of Object.entries(socials)) {
        const element = document.createElement('a');
        const label = social.name.toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
        element.href = social.url;
        element.classList.add('th-fg');
        element.target = '_blank';
        element.title = label;
        if(social.icon && social.icon.trim() !== "") {
            const socialimg = document.createElement('i');
            socialimg.className = social.icon;
            element.appendChild(socialimg);
        }
        else
        {
            element.textContent = social.name;
        }
        container.appendChild(element);
    }
    document.getElementById('sections').appendChild(container);
}
function renderproducts(products)
{
    const container = document.createElement('div');
    container.id = 'products';
    container.style = 'display: grid; grid-template-columns: repeat(3,1fr); gap: 10px;';
    for (const [id,product] of Object.entries(products ?? {}))
    {
        const element = document.createElement('a');
        element.textContent = product.label;
        element.style = 'border-radius: 10px;';
        element.classList.add('th-surface', 'th-accent-text', 'th-border', 'p-2', 'm-2','text-decoration-none','d-block','text-center');
        // Add Image if it exists
        if (product.img && product.img.trim() !== "") {
            const img = document.createElement('img');
            img.src = product.img;
            img.alt = product.label;
            img.style = 'display: block; margin: 0 auto 10px auto; max-height: 30vh; max-width: 100%; object-fit: contain;';
            element.appendChild(img);
        }
        if (product.url && product.url.trim() !== "") {
            element.href = product.url;
            element.target = '_blank';
        }
        container.appendChild(element);
    }
    document.getElementById('sections').appendChild(container);
}
function renderlinks(links){
    const container = document.createElement('div');
    container.id = 'links';
    for (const [id,link] of Object.entries(links)) {
        const element = document.createElement('a');
        element.href = link.url;
        element.target = '_blank';
        element.textContent = link.name;
        element.classList.add('th-surface', 'th-accent-text', 'th-border');
        container.appendChild(element);
    }
    document.getElementById('sections').appendChild(container);
}
async function initedit(){
    try{
        const response = await fetch('config.json');
        const config = await response.json();
        const activetheme = config.theme || 'default';
        document.body.setAttribute('th-theme', activetheme);

        const query = window.location.search;
        if(query.startsWith('?@'))
        {
            const username = query.slice(2);
            const h2 = document.createElement('h2');
            h2.textContent = `Editing @${username}`;
            h2.classList.add('th-accent-text', 'text-center', 'mb-4');
            document.getElementById('container').appendChild(h2);

            try {
                const response = await fetch(`${username}.user`);
                const userdata = await response.json();
                const profileditor = document.createElement('div');
                profileditor.id = 'profileeditor';
                profileditor.classList.add('mb-4','th-border','th-surface','p-3','rounded');
                profileditor.innerHTML = `${JSON.stringify(userdata, null, 2)}`;
                document.getElementById('container').appendChild(profileditor);
            } catch (error) {
                errormessage(`User Not Found`);
            }
        }
        else
        {
            const h2 = document.createElement('h2');
            h2.textContent = 'User List';
            h2.classList.add('th-accent-text', 'text-center', 'mb-4');
            document.getElementById('container').appendChild(h2);

            userlist = document.createElement('div');
            userlist.id = 'userlist';
            document.getElementById('container').appendChild(userlist);
            for (const [id, user] of Object.entries(config.users)) {
                const userelement = document.createElement('a');
                userelement.href = `edit.html?@${user.name}`;
                userelement.textContent = user.label;
                userelement.classList.add('th-surface', 'th-accent-text', 'th-border', 'd-block', 'text-center', 'p-2', 'mb-2','text-decoration-none');
                document.getElementById('userlist').appendChild(userelement);
            }
        }
    }
    catch(err){
        errormessage(`Config Not Found`);
        return;
    }
}
function errormessage(message){
    const error = document.getElementById('error');
    error.innerHTML = message;
    document.title = message;
}
document.addEventListener('DOMContentLoaded', () => {
    footertxt = `
    <footer class="th-bg th-fg py-3 mt-5">
        <div class="text-center mb-2">
            <p class="mb-0">
                Want your own link aggregator?
                <a href="https://github.com/darwishzain/link-aggregator" class="th-accent-text fw-bold" style="text-decoration: none;">
                    Build your own
                </a>
                or
                <a href="https://github.com/darwishzain/link-aggregator" class="th-accent-text fw-bold" style="text-decoration: none;">
                    Create yours
                </a>
            </p>
        </div>
        <div class="container text-center">
            <small>
                © 2025 Darwish Zain Studio. All rights reserved. |
                <a href="https://github.com/darwishzain/link-aggregator" class="text-decoration-none th-fg" target="_blank" rel="noopener noreferrer">
                    View on GitHub
                </a>|
                <a href="https://opensource.org/licenses/MIT" class="text-decoration-none th-fg" target="_blank" rel="noopener noreferrer">
                    MIT License
                </a>
            </small>
        </div>
    </footer>`;
    const footer = document.createElement('footer');
    footer.innerHTML = footertxt;
    document.body.appendChild(footer);
});
