<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("scroll", function() {
        const navbar = document.querySelector(".navbar");
        if (window.scrollY > 10) {
            navbar.classList.remove("navbar-transparent");
            navbar.classList.add("navbar-black");
        } else {
            navbar.classList.add("navbar-transparent");
            navbar.classList.remove("navbar-black");
        }
    });

    // Smooth scrolling with offset
    document.querySelectorAll("a.nav-link").forEach(anchor => {
        anchor.addEventListener("click", function(e) {
            e.preventDefault();
            const targetId = this.getAttribute("href").slice(1);
            const targetElement = document.getElementById(targetId);
            const offset = document.querySelector(".navbar").offsetHeight;

            window.scrollTo({
                top: targetElement.offsetTop - offset,
                behavior: "smooth"
            });
        });
    });
</script>