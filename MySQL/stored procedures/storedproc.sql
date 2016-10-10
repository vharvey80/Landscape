/*Procédures stockées*/

delimiter #
create procedure MostLike()
begin
select description, image, tbl_like.no_paysage, count(tbl_like.no_paysage) as nbreLiked 
from tbl_like
inner join tbl_paysage 
on tbl_like.no_paysage = tbl_paysage.no_paysage 
group by tbl_like.no_paysage 
order by nbreLiked DESC limit 10;
end #

delimiter #
create procedure AllPict(in Categorie int(5))
begin
select description, image, tbl_paysage.no_paysage, count(tbl_like.no_paysage) as nbreLiked 
from tbl_like
right outer join tbl_paysage 
on tbl_like.no_paysage = tbl_paysage.no_paysage 
inner join tbl_categoriepaysage
on tbl_paysage.no_paysage = tbl_categoriepaysage.no_paysage
where tbl_categoriepaysage.no_categorie = Categorie
group by tbl_paysage.no_paysage
order by nbreLiked DESC;
end #

delimiter #
create procedure Pictures()
begin
select description, image, tbl_paysage.no_paysage, count(tbl_like.no_paysage) as nbreLiked 
from tbl_like
right outer join tbl_paysage 
on tbl_like.no_paysage = tbl_paysage.no_paysage 
group by tbl_paysage.no_paysage
order by nbreLiked DESC;
end #

delimiter #
create procedure ButtonLike(in NoEmp int(5), in NoPict int(5))
begin
select no_membre from tbl_like where no_paysage = NoPict and no_membre = NoEmp;
end #

delimiter #
create procedure Liked(in NoEmp int(5), in NoPict int(5))
begin
delete from tbl_like where no_paysage = NoPict and no_membre = NoEmp;
end #

delimiter #
create procedure Dislike(in NoEmp int(5), in NoPict int(5))
begin
INSERT INTO `tbl_like` (`no_membre`, `no_paysage`)
value (NoEmp, NoPict);
end #

delimiter #
create procedure Last3Like(in NoEmp int(5))
begin 
select tbl_paysage.no_paysage, description, image, tbl_like.no_membre
from tbl_like
inner join tbl_paysage
on tbl_like.no_paysage = tbl_paysage.no_paysage
where tbl_like.no_membre = NoEmp
group by tbl_paysage.no_membre
order by tbl_paysage.no_paysage DESC limit 3;
end #

delimiter $$
CREATE PROCEDURE Add_Membre(Nom Varchar(35),Prenom Varchar(35),Email Varchar(35),Pseudo Varchar(35),Passe Varchar(35))
begin
INSERT INTO tbl_membre (`nom_membre`,`prenom_membre`,`email`,`pseudonyme`,`password_membre`)
values(Nom,Prenom,Email,Pseudo,Passe);
end $$


SET SQL_SAFE_UPDATES = 0;
delimiter ||
CREATE PROCEDURE Changer_Password(VEmail Varchar(35),Passe Varchar(35))
begin
UPDATE tbl_membre
set password_membre = Passe
where email = VEmail;
end ||


SET SQL_SAFE_UPDATES = 0;
delimiter ||
CREATE PROCEDURE Changer_Nom(VEmail Varchar(35), Nom varchar(35), Prenom varchar(35))
begin
UPDATE tbl_membre
set prenom_membre = Prenom, nom_membre = Nom
where email = VEmail;
end ||