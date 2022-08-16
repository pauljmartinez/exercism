<?php

class Bob
{

    public function respondTo($query)
    {
        $retval = "";

		if ($this->isEmpty($query)) {
		    $retval = "Fine. Be that way!";
		}
		elseif ($this->hasNoLowercase($query) && $this->hasAtLeastOneUppercase($query) && $this->endsWithQuestionMark($query)) {
			$retval = "Calm down, I know what I'm doing!";
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
		$search = explode(",","Ã§,Ã¦,Å“,Ã¡,Ã©,Ã­,Ã³,Ãº,Ã ,Ã¨,Ã¬,Ã²,Ã¹,Ã¤,Ã«,Ã¯,Ã¶,Ã¼,Ã¿,Ã¢,Ãª,Ã®,Ã´,Ã»,Ã¥,Ã¸,Ã˜,Ã…,Ã�,Ã€,Ã‚,Ã„,Ãˆ,Ã‰,ÃŠ,Ã‹,Ã�,ÃŽ,Ã�,ÃŒ,Ã’,Ã“,Ã”,Ã–,Ãš,Ã™,Ã›,Ãœ,Å¸,Ã‡,Ã†,Å’");
		$replace = explode(",","c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,o,O,A,A,A,A,A,E,E,E,E,I,I,I,I,O,O,O,O,U,U,U,U,Y,C,AE,OE");
		return str_replace($search, $replace, $str);
	}
}