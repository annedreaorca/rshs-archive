<!-- Loading Screen -->
<div class="loading-screen" id="loadingScreen">
    <div class="loader"></div>
    <p class="loading-text neural-grotesk">Loading <?= isset($pageTitle) ? $pageTitle : 'Default Title' ?>...</p>
</div>

<script>
    // Simulating a loading process
    setTimeout(() => {
        document.getElementById("loadingScreen").classList.add("hidden");
        document.getElementById("mainContent").style.display = "flex";
    }, 1000); // 3-second delay
</script>