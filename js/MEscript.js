function controlla_registrazione(){

document.FormRegistrazione_Ente
	{
     if(nome.value=="")
		{
        alert("Inserire nome");
			nome.focus();

			return false;
		}

	 if(cognome.value=="")
		{
         alert("Inserire cognome");
			cognome.focus();


			return false;
         }
     if(mail.value=="")
		{
         alert("Inserire email");
			mail.focus();


			return false;
         }
      if(password.value=="")
		{
         alert("Inserire password");
			password.focus();


			return false;
         }
}
}
