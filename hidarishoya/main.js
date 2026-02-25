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
                if(userdata.icon && userdata.icon.trim !== ""){
                    favicon.href = userdata.icon;
                }
                else{
                    favicon.href = 'assets/default-icon.png';
                }
                //* PROFILE
                const profileimg = document.createElement('img');
                if(userdata.profile && userdata.profile.trim !== ""){
                    profileimg.src = userdata.profile;
                }
                else{
                    profileimg.src = 'assets/default-profile.png';
                }
                profileimg.classList.add('rounded-circle');
                document.getElementById('profile').appendChild(profileimg);
                if(userdata.username && userdata.username.trim !== ""){
                    document.title = '@'+userdata.username;
                    const username = document.createElement('h3');
                    username.textContent = '@'+userdata.username;
                    document.getElementById('profile').appendChild(username);
                }
                if(userdata.bio && userdata.bio.trim !== ""){
                    const bio = document.createElement('p');
                    bio.classList.add('w-50','mx-auto','opacity-75');
                    bio.textContent = `${userdata.bio}`;
                    document.getElementById('profile').appendChild(bio);
                }
                document.getElementById('profile').classList.add('th-fg');
                //* SOCIALS
                for (const [id, social] of Object.entries(userdata.socials)) {
                    const socialelement = document.createElement('a');
                    label = social.name.toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
                    socialelement.href = social.url;
                    socialelement.classList.add('th-fg');
                    socialelement.target = '_blank';
                    socialelement.title = label;
                    if(social.icon && social.icon.trim() !== "") {
                        const socialimg = document.createElement('i');
                        socialimg.className = social.icon;
                        socialelement.appendChild(socialimg);
                    }
                    else
                    {
                        socialelement.textContent = social.name;
                    }
                    document.getElementById('socials').appendChild(socialelement);
                }
                //* LINKS
                for (const [id,link] of Object.entries(userdata.links)) {
                    const linkelement = document.createElement('a');
                    linkelement.href = link.url;
                    linkelement.target = '_blank';
                    linkelement.textContent = link.name;
                    linkelement.classList.add('th-surface', 'th-accent-text', 'th-border');
                    if(link.img && link.img.trim() !== "") {
                        const linkimg = document.createElement('img');
                        linkimg.src = link.img;
                        linkimg.alt = link.name;
                        linkimg.style = 'display: block;margin-bottom: 10px;height: 50vh;max-width: 100%;';
                        linkelement.appendChild(linkimg);
                    }
                    document.getElementById('links').appendChild(linkelement);
                }
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
    footertxt = `<footer class="th-bg th-fg py-3 mt-5">
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
