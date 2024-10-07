<?php
include 'config.php';

// Determine the language
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';

// Include the corresponding language file
$langFile = "lang_$lang.php";
if (file_exists($langFile)) {
    $translations = include($langFile);
} else {
    $translations = include('lang_en.php'); // Default to English
}

// Ensure that all keys exist in the translations array
$keys = ['whatsapp', 'instagram', 'user_icon', 'indonesian', 'english', 'open_hour'];
foreach ($keys as $key) {
    if (!isset($translations[$key])) {
        $translations[$key] = $key; // Default to the key itself if not found
    }
}

// Fetch data from database
$sql = "SELECT * FROM tb_sisi_atas ORDER BY link_wa DESC";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Output data from each row
    while($row = $result->fetch_assoc()) {
        echo '<header>
                <!-- header inner -->
                <div class="header">
                   <div class="header_top d_none1">
                      <div class="container">
                         <div class="row">
                         <div class="col-md-4">
                               <ul class="conta_icon">
                               <li><a href="' . htmlspecialchars($row['link_wa']) . '" ><img src="images/call.png" alt="#"/>' . $translations['whatsapp'] . '</a> 
                                  <a href="' . htmlspecialchars($row['link_ig']) . '"><i class="fa fa-instagram" aria-hidden="true"></i>' . $translations['instagram'] . '</a></li>
                               </ul>
                            </div>
                            <div class="col-md-4">
                               <ul class="social_icon">
                                  <li> <a class="logo" href="administrator/login/index.php"><img src="images/user-icon.png" alt="' . $translations['user_icon'] . '"/></a></li>
                               </ul>
                            </div>
                            <div class="col-md-4">
                               <div class="se_fonr1">
                                  <form action="#">
                                     <div class="select-box">
                                        <label for="select-box1" class="label select-box1"><span class="label-desc">' . $translations['indonesian'] . '</span></label>
                                        <select id="select-box1" class="select" onchange="window.location.href=\'set_language.php?lang=\' + this.value;">
                                           <option value="id" ' . ($lang == 'id' ? 'selected' : '') . '>' . $translations['indonesian'] . '</option>
                                           <option value="en" ' . ($lang == 'en' ? 'selected' : '') . '>' . $translations['english'] . '</option>
                                        </select>
                                     </div>
                                  </form>
                                  <span class="time_o"> ' . $translations['open_hour'] . htmlspecialchars($row['jam']) . '</span>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </header>';
    }
} else {
    echo '<div class="col-md-4">' . $translations['no_data'] . '</div>';
}
?>
