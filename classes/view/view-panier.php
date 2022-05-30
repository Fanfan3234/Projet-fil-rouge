<?php
require_once '../model/model-marque.php';

class ViewMarque
{

    public static function listeMarque()
    {
        $marque = new ModelMarque();
        $liste = $marque->listeMarque();
    	
        
        ?>
        <div class="panier content-wrapper">   
            <h1>Panier d'achat</h1>   
            <form action="index.php?page=panier" method="post">   
                <table>  
                   <thead>   
                       <tr>   
                           <td colspan="2">produit</td>   
                           <td>prix</td>   
                           <td>quantité</td>   
                           <td>Total</td>   
                       </tr>   
                   </thead>   
                   <tbody>   
                       <?php if (empty($produit)): ?>   
                       <tr>   
                           <td colspan="5" style="text-align:center;">Vous n'avez aucun produit ajouté dans votre panier</td>   
                       </tr>   
                       <?php else: ?>   
                       <?php foreach ($produit as $produit): ?>   
                       <tr>   
                           <td class="img">   
                               <a href="index.php?page=produit&id=<?=$produit['id']?>">   
                                   <img src="imgs/<?=$produit['img']?>" width="50" height="50" alt="<?=$produit['nom']?>">   
                               </a>
                           </td>   
            <td><a href="index.php?page=produit&id=<?=$produit['id']?>"><?=$produit['nom']?></a>   
                               <br>   
                               <a href="index.php?page=panier&remove=<?=$produit['id']?>" class="remove"><i class="fas fa-trash">&nbsp;</i>Supprimer </a></td>   
                           <td class="prix">&dollar;<?=$produit['prix']?></td>   
                           <td class="quantité"><input type="number" name="quantité-<?=$produit['id']?>" value="<?=$produits_in_panier[$produit['id']]?>" min="1" max="<?=$produit['quantité']?>" placeholder="quantité" required></td>   
         <td class="prix">&dollar;<?=$produit['prix']*$produits_in_panier[$produit['id']]?></td>   
                       </tr>   
                       <?php endforeach; ?>   
                       <?php endif; ?>   
                   </tbody>   
               </table>  
               <div class="subtotal">   
                   <span class="text">Subtotal</span>   
                   <span class="prix">&dollar;<?=$subtotal?></span>   
               </div>  
               <div class="buttons">   
                   <input type="submit" value="Mettre à jour" name="update">   
                   <input type="submit" value="Passer la commande" name="placerCommade">           </div>  
           </form>   
       </div>
     <?=template_footer()?>
     
   <?php 


}
}