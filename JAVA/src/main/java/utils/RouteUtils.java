package utils;

public class RouteUtils {
	
	//Fonction pour tester si un �l�ment est dans un registre d'�l�ments
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