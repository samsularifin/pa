	<script src="<?php echo base_url();?>desainadmin/js/jquery-1.7.2.min.js">
	</script>
		
<?php
	if(count($ambil_soal)>0){
	//$getTime = "";
					?>
<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
			<h3>Ambil Test Online</h3>
			<!--<input type="button" class="trigger" value="Start" /> -->
			<!--<span id="countdown" class="timer"></span> -->
			<!--<div class="show">
			</div>-->
			
			
		</div>
		<!--<div class="timer"></div>
		<div class="show"></div> -->
	<!-- /widget-header -->

		<div class="widget-content">
		<?php
			$id_quiz = 0;
		?>
			<form action="<?php echo base_url();?>member/test/submit/" method="POST">
			<ol style="margin:30px 50px 30px 50px">
						<?php
								foreach($ambil_soal as $data){
									
										$id_soal = $data->ID_SOAL_QUIZ;
										$id_quiz = $data->ID_QUIZ;
										
										/*QUERY BUAT NGAMBIL ID_PELATIHAN PADA QUIZ */
										$this->db->select('ID_QUIZ, ID_PELATIHAN');
										$this->db->from('QUIZ');
										$this->db->where('ID_QUIZ',$id_quiz);
										$query = $this->db->get();
											foreach($query->result() as $ambilvalue){
												$id_pelatihan = $ambilvalue->ID_PELATIHAN;
			
											}
										/*END QUERY */
										?>
										<input type="hidden" name="ambil_id_quiz" value="<?php echo $id_quiz;?>">
										<input type="hidden" name="ambil_id_pelatihan" value="<?php echo $id_pelatihan;?>">
										
										<?php
									///	$getTime = $data->WAKTU_QUIZ;
										foreach($data_quiz as $getTime){
										?>
									<!--<div id="getTime" value="<?php echo $getTime->WAKTU_QUIZ;?>"></div> -->
										<?php
											}
										?>
									<input type="hidden" name="idsoal[<?php echo $data->ID_SOAL_QUIZ;?>]" value="<?php echo $id_soal;?>">
									<input type="hidden" name="idquiz[<?php echo $data->ID_QUIZ;?>]" value="<?php echo $id_quiz;?>">
								 <li>
									<?php
										echo $data->ISI_SOAL;
										
										//foreach($jawaban_quiz_tutor as $data2){
										/* QUERY UNTUK MENGAMBIL JAWABAN SESUAI DENGAN ID_SOAL DI ATAS */
										$this->db->select('SOAL_QUIZ.ID_SOAL_QUIZ, SOAL_QUIZ.ID_QUIZ, SOAL_QUIZ.ISI_SOAL, SOAL_QUIZ.ID_KATEGORI_USER, KATEGORI_USER.ID_KATEGORI_USER, QUIZ.ID_QUIZ, JAWABAN_QUIZ.ID_JAWABAN_QUIZ, JAWABAN_QUIZ.ID_SOAL_QUIZ, JAWABAN_QUIZ.ISI_JAWABAN, JAWABAN_QUIZ.STATUS_JAWABAN');
										$this->db->from('SOAL_QUIZ');
										$this->db->where('SOAL_QUIZ.ID_QUIZ',$id_quiz);
										$this->db->join('QUIZ','SOAL_QUIZ.ID_QUIZ = QUIZ.ID_QUIZ');
										$this->db->where('SOAL_QUIZ.ID_KATEGORI_USER = 1');
										$this->db->join('KATEGORI_USER','SOAL_QUIZ.ID_KATEGORI_USER = KATEGORI_USER.ID_KATEGORI_USER');
										$this->db->where('SOAL_QUIZ.ID_SOAL_QUIZ',$id_soal);
										$this->db->join('JAWABAN_QUIZ',' SOAL_QUIZ.ID_SOAL_QUIZ = JAWABAN_QUIZ.ID_SOAL_QUIZ');
										$this->db->order_by('JAWABAN_QUIZ.ID_JAWABAN_QUIZ','ASC');
										
										$query = $this->db->get();
											foreach($query->result() as $data2){
										
									?>
                                    <div class="radio" style="margin:15px">
									
                                      <label>
                                        <input type="radio" name="jawaban[<?php echo $data2->ID_SOAL_QUIZ;?>]" id="<?php echo $data2->ID_SOAL_QUIZ;?>" value="<?php echo $data2->STATUS_JAWABAN;?>">
										
										<?php
										
											echo $data2->ISI_JAWABAN;
										
										?>
                                      </label>
                                    </div>
									</li>
									<?php
										}
										echo br(1);
									}
								 ?>
								</ol>
							
						<div class="form-actions">
							<button type="submit" class="btn btn-primary" style="background:#62a8d9">Submit Tes</button>
							</div> <!-- /form-actions -->
						</form>
		</div>
		<br/><br/>
	<?php
		}else{
			echo '
					<div class="row-fluid">
						<div class="span12 alert alert-error">
						<button type="button" class="close" data-dismiss="alert">&times;</button>Data Kosong
						</div>
					</div>';
						}
	?>
</div>
<script type="text/javascript">
function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}

$(document ).ready(function() {
    $(this).html('show')
    $('.show').slideUp('medium');
    var count = 20;
    if (readCookie("timer") != undefined) count = readCookie("timer");
    
    var counter = setInterval(timer, 1000);

    function timer() {
        createCookie("timer", count, 365);
        count--;
        if (count <= 0) {
            clearInterval(counter);
            $('.trigger').html('hide');
            $('.show').slideDown('medium');
            eraseCookie("timer");
            return;
        }
        console.log(count);
        console.log(readCookie("timer"));
        $('.timer').html(count);
    }
});
</script>
<!--<script>
var seconds = document.getElementById("getTime").value;
alert(seconds);
function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Waktu habis. Sistem otomatis akan redirect halaman";
    } else {
        seconds--;
    }
}
 
var countdownTimer = setInterval('secondPassed()', 1000);
http://www.codingforums.com/javascript-programming/195503-convert-integer-time-format.html
</script> -->
