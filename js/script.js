document.addEventListener('DOMContentLoaded', ()=>{

    const togglebarClassBtn = document.querySelector('button.sidebar-toggle');
    const togglebarIdBtn = document.querySelector('button.sideBarToggleTwo');
    const mainContetElm = document.querySelector('.main-content');

    const sidebarElm = document.querySelector('.sidebar')

    togglebarClassBtn.addEventListener('click', ()=>{

        sidebarElm.classList.toggle('active');

        mainContetElm.classList.toggle('fullPageContent')

    })

    togglebarIdBtn && togglebarIdBtn.addEventListener('click' , ()=>{
        sidebarElm.classList.toggle('active');

    })

    // admin toggle
    // Admin Dropdown
    const adminTrigger = document.querySelector('.admin-trigger');
    const dropdownMenu = document.querySelector('.dropdown-menu');
    const logoutBtn = document.getElementById('logoutBtn');

    adminTrigger && adminTrigger.addEventListener('click', () => {
        dropdownMenu.classList.toggle('active');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!adminTrigger.contains(e.target)) {
            dropdownMenu.classList.remove('active');
        }
    });

    // Logout functionality
    // logoutBtn && logoutBtn.addEventListener('click', (e) => {
    //     e.preventDefault();
    //     if(confirm('Are you sure you want to logout?')) {
    //         window.location.href = 'logout.php';
    //     }
    // });

    // active nav link
    // ...existing code...

    // Handle active navigation links
    function setActiveLink() {
        const currentPage = window.location.pathname.split("/").pop();
        const navLinks = document.querySelectorAll('.nav-links a');

        console.log(currentPage);
        
        
        navLinks.forEach(link => {
            
            // Remove active class from all links
            link.classList.remove('active');
            
            // Get href value and clean it
            const href = link.getAttribute('href').replace('./', '');
            
            // Check if current page matches link href
            if (currentPage === href ||
                (currentPage === '' && href === 'index.php') || href === 'user.php') {
                link.classList.add('active');
            }
        });
    }



    // Call function when DOM loads
    setActiveLink();    

 

})

