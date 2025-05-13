<?php $pageTitle = 'Archive';
    include 'layout-header.php';
    include 'components/loading.php';
?>
<main class="flex bg-front overflow-hidden max-[840px]:items-end main-content" id="mainContent">
    <section class="flex flex-row wide-container max-[840px]:flex-col max-[840px]:!w-full">
        <div class="w-[50%] justify-center flex min-[841px]items-center max-[840px]:bg-white max-[840px]:items-end ml-right z-1 !py-[75px] !pr-[100px] max-[1140px]:!pr-[50px] max-[840px]:!pr-[30px] max-[840px]:!pl-[30px] max-[840px]:!w-full">
            <div class="flex flex-col justify-center gap-6 z-1 ">
                <div class="flex flex-col gap-[30px]">
                    <img src="assets/images/Archive-Favicon.png" alt="Archive Logo" class="w-[75px]">
                    <div class="mt-5">
                        <span class="font-bold text-primary text-[20px] neural-grotesk">Welcome To</span>
                        <h1 class="text-[54px] max-[840px]:text-[42px] font-600 text-dark text-left !mb-2">Archive</h1>
                        <span class="text-[20px] accents neural-grotesk text-zinc-600 text-left !mb-5">Effortlessly Manage and Borrow Lab Equipment</span>
                        <p class="text-[16px] font-300 helvetica text-zinc-600 text-left !mt-5">Archive is a streamlined inventory system designed for science laboratories. Whether you're a student looking to borrow equipment or a teacher managing lab resources, Archive ensures an efficient and organized experience.</p>
                    </div>
                    <div class="flex flex-row gap-5 !mt-3">
                        <a href="admin/sign-in" class="button-outline">Admin</a>
                        <a href="students/sign-in" class="button-primary">Student</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[50%] max-[840px]:!w-full max-[640px]:hidden">
        </div>
    </section>
</main>
<?php include 'layout-footer.php'; ?>