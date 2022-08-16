<?php

class Bob
{

    public function respondTo($query)
    {
        $retval = "";

		if ($this->isEmpty($query)) {
		    $retval = "Fine. Be that way!";
		}
		elseif ($this->hasNoLowercase($query) && $this->hasAtLeastOneUppercase($query)) {
			$retval = "Whoa, chill out!";
		}
		elseif ($this->endsWithQuestionMark($query)) {
			$retval = "Sure.";
		}
		else {
			$retval = "Whatever.";
		}

        return $retval;
    }

    // See http://php.net/manual/en/function.trim.php
    public function isEmpty($query) {
    	$query = trim($query, "\n\r \t\u000b\u00a0\u2002");
        return ($query == "") ? true : false ;
    }

    public function hasNoLowercase($query) {
    	$query = $this->replaceAccents($query);
        return preg_match('/[a-z]+/', $query) === 0;
    }

    public function hasAtLeastOneUppercase($query) {
    	$query = $this->replaceAccents($query);
        return preg_match('/[A-Z]+/', $query) === 1;
    }

    public function endsWithQuestionMark($query) {
    	$query = trim($query);
        return preg_match('/\?$/', $query) === 1;
    }

    // See http://stackoverflow.com/questions/10054818/convert-accented-characters-to-their-plain-ascii-equivalents
	public function replaceAccents($str) {
		$search = explode(",","ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,ø,Ø,Å,Á,À,Â,Ä,È,É,Ê,Ë,Í,Î,Ï,Ì,Ò,Ó,Ô,Ö,Ú,Ù,Û,Ü,Ÿ,Ç,Æ,Œ");
		$replace = explode(",","c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,o,O,A,A,A,A,A,E,E,E,E,I,I,I,I,O,O,O,O,U,U,U,U,Y,C,AE,OE");
		return str_replace($search, $replace, $str);
	}
}
