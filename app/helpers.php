<?

function setChecked($v)
{
	return is_null($v) || $v ? 'checked=""' : '';
}