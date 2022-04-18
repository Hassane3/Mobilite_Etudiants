package utils;

public class RouteUtils {
	
	//Fonction pour tester si un élément est dans un registre d'éléments
	public static boolean isValid(String[] registre, String element) {
		int i=0;
		while (i<registre.length) {
			if (registre[i].equals(element)) {
				return true;
			}
			i++;
		}
		return false;
	}
	
}