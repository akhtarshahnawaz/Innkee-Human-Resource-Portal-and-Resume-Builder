Innkee Human Resource Portal and Resume Builder
===============================================
Innkee Human Resource Portal and Resume Builder is a HR portal application where users can register for jobs or internship. Employers can also register to search for candidates based on various search parameters. There is also a resume builder tab where candidates can download a formatted resume in pdf based on information they provided in their profile. 

Requirements
============

1. Enable PHP Installation to support Bracket Type "[]" array. This is only available in PHP versions 5.5.0 and above


Installation
============

1. Go to "Innkee-Human-Resource-Portal-and-Resume-Builder/application/config/database.php"
2. Edit Lines

        $db['default']['username'] = '<YOUR DATABASE USERNAME>';
        $db['default']['password'] = '<YOUR DATABASE PASSWORD>';
        $db['default']['database'] = '<YOUR DATABASE NAME>';				


3. Go to link  "<installation folder>/index.php/install"
4. Fill in Username and Password for managing portal



Email Setup
============

1. Go to "Innkee-Human-Resource-Portal-and-Resume-Builder/application/config/email.php"
2. Edit Lines

		$config['smtp_host'] = '<SMTP HOST>';
		$config['smtp_user'] = '<SMTP USERNAME>';
		$config['smtp_pass'] = '<SMTP PASSWORD>';
