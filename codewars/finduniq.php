<pre>

<?php
function findUniq($a)
{
	$c = 0;
	$d = 0;
	$retc = array("", "");
	$retd = array("", "");
	$nums = array_unique($a);

	foreach($a as $num)
	{
		if($nums[0] == $num)
		{
			$c++;
			$retc = array($num, $c);
		}

		if($nums[1] == $num)
		{
			$d++;
			$retd = array($num, $d);
		}
	}

	if($retd[1] == 1) return $retd[0];
	if($retc[1] == 1) return $retc[0];
}

die(var_dump(findUniq([1,0.55,1,1,1,1])));
?>