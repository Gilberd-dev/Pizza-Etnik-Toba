 <div class="form" style="background-image: url(../Pictures/bckg.jpg);">
     <center>
         <br><br><br>
         <h1 style="font-family: 'Reem Kufi Fun', sans-serif; letter-spacing: 4px; color: aliceblue;">MASUKAN
        </h1>

     </center>
     <br><br>
     <form role="form" action="feedback_proses.php" method="POST" enctype="multipart/form-data">
         <div class="row">
             <div class="column nama col-lg-4">
                 <input class="input" type="text" placeholder="Masukkan Nama Anda" name="nama">
             </div>
             <div class="column email col-lg-4   ">
                 <input class="input" type="email" placeholder="Masukkan email Anda" name="email">
             </div>
             <br> <br> <br>
             <div class="comment col-lg-6">
                 <textarea class="textinput" placeholder="Ketik Masukan Anda" name="masukan"></textarea>
             </div>
             <br> <br><br>
             <!-- <div class="column col-lg-2"">
                <input type="file" class="input  file" name="gambar">
                </div> -->
             <div class="column col-lg-2">
                <label for=" images" class="drop-container">
                 <span class="drop-title">Letakkan file disini</span>
                 atau
                 <input type="file" id="images" accept="image/*, video/*" name="gambar_video_masukan">
                 </label>
                 <!-- <input type="file" name="gambar_video_masukan" class="input file"> -->
             </div>
             <div class="column col-lg-12">
                 <center><input type="submit" class="submit" value="Kirim"> </center>
             </div>
         </div>
 </div>
 </form>