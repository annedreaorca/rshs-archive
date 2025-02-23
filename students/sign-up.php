<?php $pageTitle = 'Labzada';
    include '..layout-header.php';
?>
<main class="bg-primary overflow-hidden">
    <div class="absolute top-1/2 left-[65%] transform -translate-x-1/2 -translate-y-1/2 gradient-animation z-0"></div>
    <section class="flex justify-center items-center bg-primary p-[20px] default-container h-screen">
        <div class="flex bg-light rounded-[15px] !p-[20px] shadow-lg z-1 w-full">
            <form class="flex flex-col gap-12 w-full" action="register.php" method="post" autocomplete="off">
                <div class="flex flex-col gap-4 form-header-wrapper">
                        <h1 class="text-3xl font-600 text-dark text-left mt-5">Sign Up</h1>
                        <p class="text-zinc-600 mt-2">Please enter your credentials below.</p>
                </div>
                <div class="flex gap-4 w-full">
                    <div class="flex flex-col gap-4 w-full">
                        <div class="flex flex-col gap-3 w-full">
                            <input type="text" class="!px-4 !py-3 border-1 border-zinc-400 rounded-[7px] " name="studid" id="studid" placeholder="Enter your Student ID">
                            <input type="password" class="!px-4 !py-3 border-1 border-zinc-400 rounded-[7px]" name="password" id="pass" placeholder="Enter your Password">
                        </div>
                        <a href="#" class="text-accent text-sm font-500">Forgot Password?</a>
                    </div>
                    <div class="flex flex-col gap-4 w-full">
                        <div class="flex flex-col gap-3 w-full">
                            <input type="text" class="!px-4 !py-3 border-1 border-zinc-400 rounded-[7px]" name="studid" id="studid" placeholder="Enter your Student ID">
                            <input type="password" class="!px-4 !py-3 border-1 border-zinc-400 rounded-[7px]" name="password" id="pass" placeholder="Enter your Password">
                        </div>
                        <a href="#" class="text-accent text-sm font-500">Forgot Password?</a>
                    </div>
                </div>
                <div class="flex justify-start gap-4">
                    <button type="submit" class="bg-primary rounded-[7px] !px-10 !py-4 text-center text-light font-500">Sign Up</button>
                </div>
            </form>
        </div>
    </section>
</main>
<?php include 'layout-footer.php'; ?>