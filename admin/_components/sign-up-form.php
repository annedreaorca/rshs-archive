<form class="flex flex-col gap-12" action="login.php" method="post" autocomplete="off">
    <div class="flex flex-col gap-4">
        <div class="flex flex-col gap-3">
            <input type="text" class="!px-4 !py-3 border-1 border-zinc-400 rounded-[7px]" name="studid" id="studid" placeholder="Enter your Student ID">
            <input type="password" class="!px-4 !py-3 border-1 border-zinc-400 rounded-[7px]" name="password" id="pass" placeholder="Enter your Password">
        </div>
        <a href="#" class="text-accent text-sm font-500">Forgot Password?</a>
    </div>
    <button type="submit" class="bg-primary rounded-[7px] !px-4 !py-3.5 text-center text-light font-500 w-full">Login</button>
</form>