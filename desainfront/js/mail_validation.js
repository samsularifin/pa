// var $mjq for better adaptation and work with other libraries
var $mjq = jQuery.noConflict();
$mjq(function(){
	$mjq(document).ready(function(){
		 $mjq(".help-inline").each(function() {
			$mjq(this).css('display', 'none');
		 });
		 $mjq(".help-retype").each(function() {
			$mjq(this).css('display', 'none');
		 });
	});
	//$mjq("#inputEmail").bind('blur', is_valid_email);
	$mjq("#inputName").bind('blur', is_valid_name);
	$mjq("#tempatLahir").bind('blur', is_valid_tempatLahir);
	$mjq("#alamat").bind('blur', is_valid_alamat);
	$mjq("#notel").bind('blur', is_valid_notel);
	$mjq("#agama").bind('blur', is_valid_agama);
	$mjq("#pekerjaan").bind('blur', is_valid_pekerjaan);
	$mjq("#username").bind('blur', is_valid_username);
	$mjq("#password").bind('blur', is_valid_password);
	$mjq("#ulangipassword").bind('blur', is_valid_ulangiPassword);
	//$mjq("#textarea").bind('blur', is_valid_comment);
	$mjq('#validForm').bind('submit', function() {
		return is_valid_form();
	});
});
// Email validate
/*function is_valid_email() {
	$this = $mjq("#inputEmail");
	var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	if(pattern.test($this.val())){ // valid
		if ($this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").removeClass("error");
		$this.siblings(".help-inline").css("display", "none");
		return true;
	} else { // error
		if (!$this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").addClass("error");
		$this.siblings(".help-inline").css("display", "block");
		return false;
	}
} */
// Name validate
function is_valid_notel() {
	$this = $mjq("#notel");
	var pattern = new RegExp(/^\d{12}$/); 
	if(pattern.test($this.val())){ // valid
		if ($this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").removeClass("error");
		$this.siblings(".help-inline").css("display", "none");
		return true
	} else { // error
		if (!$this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").addClass("error");
		$this.siblings(".help-inline").css("display", "block");
		return false;
	}
}
function is_valid_name() {
	$this = $mjq("#inputName");
	if($this.val().length>0){ // valid
		if ($this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").removeClass("error");
		$this.siblings(".help-inline").css("display", "none");
		return true
	} else { // error
		if (!$this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").addClass("error");
		$this.siblings(".help-inline").css("display", "block");
		return false;
	}
}
function is_valid_tempatLahir() {
	$this = $mjq("#tempatLahir");
	if($this.val().length>0){ // valid
		if ($this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").removeClass("error");
		$this.siblings(".help-inline").css("display", "none");
		return true
	} else { // error
		if (!$this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").addClass("error");
		$this.siblings(".help-inline").css("display", "block");
		return false;
	}
}
function is_valid_alamat() {
	$this = $mjq("#alamat");
	if($this.val().length>0){ // valid
		if ($this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").removeClass("error");
		$this.siblings(".help-inline").css("display", "none");
		return true
	} else { // error
		if (!$this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").addClass("error");
		$this.siblings(".help-inline").css("display", "block");
		return false;
	}
}
function is_valid_agama() {
	$this = $mjq("#agama");
	if($this.val().length>0){ // valid
		if ($this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").removeClass("error");
		$this.siblings(".help-inline").css("display", "none");
		return true
	} else { // error
		if (!$this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").addClass("error");
		$this.siblings(".help-inline").css("display", "block");
		return false;
	}
}
function is_valid_pekerjaan() {
	$this = $mjq("#pekerjaan");
	if($this.val().length>0){ // valid
		if ($this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").removeClass("error");
		$this.siblings(".help-inline").css("display", "none");
		return true
	} else { // error
		if (!$this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").addClass("error");
		$this.siblings(".help-inline").css("display", "block");
		return false;
	}
}
function is_valid_username() {
	$this = $mjq("#username");
	if($this.val().length>0){ // valid
		if ($this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").removeClass("error");
		$this.siblings(".help-inline").css("display", "none");
		return true
	} else { // error
		if (!$this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").addClass("error");
		$this.siblings(".help-inline").css("display", "block");
		return false;
	}
}
function is_valid_password() {
	$this = $mjq("#password");
	if($this.val().length>0){ // valid
		if ($this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").removeClass("error");
		$this.siblings(".help-inline").css("display", "none");
		return true
	} else { // error
		if (!$this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").addClass("error");
		$this.siblings(".help-inline").css("display", "block");
		return false;
	}
}
function is_valid_ulangiPassword() {
	$this = $mjq("#ulangipassword");
	$pass = $mjq("#password");
	if($this.val() != $pass.val()){
		$this.closest(".control-group").addClass("error");
		$this.siblings(".help-retype").css("display", "block");
		return false;
	}
	if($this.val().length>0){ // valid
		if ($this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").removeClass("error");
		$this.siblings(".help-inline").css("display", "none");
		return true
	}	else { // error
		if (!$this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").addClass("error");
		$this.siblings(".help-inline").css("display", "block");
		return false;
	}
}
// Comment validate
/*function is_valid_comment() {
	$this = $mjq("#textarea");
	if($this.val().length>0){ // valid
		if ($this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").removeClass("error");
		$this.siblings(".help-inline").css("display", "none");
		return true
	} else { // error
		if (!$this.closest(".control-group").hasClass("error")) 
			$this.closest(".control-group").addClass("error");
		$this.siblings(".help-inline").css("display", "block");
		return false;
	}
} */
// Form validate
function is_valid_form() {
	var ret = true;
	if (!is_valid_name()) var ret = false;
	//if (!is_valid_email()) var ret = false;
	if (!is_valid_tempatLahir()) var ret = false;
	if (!is_valid_notel()) var ret = false;
	if (!is_valid_alamat()) var ret = false;
	if (!is_valid_agama()) var ret = false;
	if (!is_valid_pekerjaan()) var ret = false;
	if (!is_valid_username()) var ret = false;
	if (!is_valid_password()) var ret = false;
	if (!is_valid_ulangiPassword()) var ret = false;
//	if (!is_valid_comment()) var ret = false;
	return ret;
}

