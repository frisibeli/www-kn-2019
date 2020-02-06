<?php

require('framework/base_controller.php');
require('app/models/qrcode.php');

class CustomController extends BaseController {

	function test() {
		$qrCode = new QRCode();

		if($_POST){
			$qrCode->create($_POST['lecturer_id'], $_POST['class_id']);
		}

		$allQrCodes = $qrCode->get_all();

		$constant = 132;

		$this->render('custom/test', [
			'qr_codes' => $allQrCodes,
			'constatnt' => $constant
		]);
	}

}
