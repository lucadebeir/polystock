-- Function: public.delete_user()

-- DROP FUNCTION public.delete_user();

CREATE OR REPLACE FUNCTION public.delete_user()
  RETURNS trigger AS
$BODY$
BEGIN

DELETE FROM alimentaire a WHERE Old.iduser = a.iduser;
DELETE FROM boisson b WHERE Old.iduser = b.iduser;
DELETE FROM event e WHERE Old.iduser = e.iduser;
DELETE FROM goodies g WHERE Old.iduser = g.iduser;
DELETE FROM produit p WHERE Old.iduser = p.iduser;
DELETE FROM stock s WHERE Old.iduser = s.iduser;
DELETE FROM utiliser u WHERE Old.iduser = u.iduser;

RETURN NEW; 

END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION public.delete_user()
  OWNER TO fvfslbtvmndeav;
