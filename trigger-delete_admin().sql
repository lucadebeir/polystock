-- Function: public.delete_admin()

-- DROP FUNCTION public.delete_admin();

CREATE OR REPLACE FUNCTION public.delete_admin()
  RETURNS trigger AS
$BODY$
begin
	if ((select count(*) from users where admin=true) < 1) THEN
		raise exception 'On ne peut pas supprimer le dernier administrateur !';
	end if;
	return null;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION public.delete_admin()
  OWNER TO fvfslbtvmndeav;
