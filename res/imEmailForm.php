<?php
if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {
	include '/res/x5engine.php';
	$form = new ImForm();
	$form->setField('Naam:', $_POST['imObjectForm_1_1'], '', false);
	$form->setField('Adres:', $_POST['imObjectForm_1_2'], '', false);
	$form->setField('e-Mail:', $_POST['imObjectForm_1_3'], '', false);
	$form->setField('GSM nummer', $_POST['imObjectForm_1_4'], '', false);
	$form->setField('', $_POST['imObjectForm_1_5'], '', false);
	$form->setField('', $_POST['imObjectForm_1_6'], '', true);
	$form->setField('Lidgeld (12,00 € per jaar)', $_POST['imObjectForm_1_7'], '', false);

	if(@$_POST['action'] != 'check_answer') {
		if(!isset($_POST['imJsCheck']) || $_POST['imJsCheck'] != 'jsactive' || (isset($_POST['imSpProt']) && $_POST['imSpProt'] != ""))
			die(imPrintJsError());
		$form->mailToOwner('bin.kaudenaarde@gmail.com', 'bin.kaudenaarde@gmail.com', 'Nieuw BIN-Lid', '', true);
		@header('Location: ../index.php');
		exit();
	} else {
		echo $form->checkAnswer(@$_POST['id'], @$_POST['answer']) ? 1 : 0;
	}
}

// End of file