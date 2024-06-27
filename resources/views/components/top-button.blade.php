<a
x-data="topBtn"

href="#home" @click="scrolltoTop" id="topButton" class="dmtop">

<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
  </svg>

</a>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('topBtn', () => ({
            scrolltoTop() {
                window.scrollTo({top: 0, behavior: 'smooth'});
            }
        }));
    });

    const topBtn = document.querySelector("#topButton");
    window.onscroll = () => {
        (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) ?
        topBtn.style.bottom = "45px": topBtn.style.bottom = "-100px";

    }
</script>
