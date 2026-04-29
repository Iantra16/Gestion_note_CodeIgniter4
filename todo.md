### base de donnée :
- structure :
  - semestre (idSemestre,numero,libelle)
  - parcours (id,nom,responsable)
  - parcour_ue (id,parcours_id,ue_id,semestre_id,obli,groupe)
  - ue(id,code,intitulé,crédit,)
  - users(id,nom,prenom,pwd)
  - etudiant(id,etu,nom,prenom)
  - group (id,nom)
  - user_group(id,user_id,group_id)
  - note(id,etu,ue_id,valeur)

###  Model :
- SemestreModel
- ParcoursModel 
- Parcour_ueModel
- UeModel
- UsersModel
- EtudiantModel
- GroupModel
- User_groupModel
- NoteModel


### Controller :
- SemestreController
- ParcoursController
- Parcour_ueController
- UeController  
- UsersController
- EtudiantController
- GroupController
- User_groupController
- NoteController
- AuthController

### View :
- Login et signup
- Etudiant/
  - index :
  - create :
  - edit :

- Semestre/
  - index :
  - create :
  - edit :
 
- Semestre/
  - index :
  - create :
  - edit :
  
- Parcours/
  - index :
  - create :
  - edit :
- Parcour_ue/
  - index :
  - create :
  - edit :
- Ue/
  - index :
  - create :    
  - edit :
- Users/
  - index :
  - create :    
  - edit :
