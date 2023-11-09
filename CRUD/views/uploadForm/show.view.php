  <?php require base_path('views/partials/head.php')?>
  <?php require base_path('views/partials/nav.php')?>
  <?php require base_path('views/partials/banner.php')?>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <p> My Uploads</p> 

         <p class="mt-6">
            <a href="/uploads/create" class="text-blue-500 hover:underline">Create Image</a>
        </p>
     <?php foreach ($images as $image):?>
      <li > 
      
       <!-- to fix xss vul !-->
      <img src='../<?=htmlspecialchars($image['image']) ?>' style="max-width: 50%; max-height: 50%; width: auto; height: auto; display: block;"  >
      </a>
      </li>
     <?php endforeach; ?>
    </div>
  </main>
 <?php require base_path('views/partials/footer.php')?>
