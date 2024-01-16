using System;

namespace examen
{
    class Program
    {

        public static void PruebaEjercicioD()
        {
            MatrizEnterosPares matrizPares = new MatrizEnterosPares();
            matrizPares.Mostrar();
            matrizPares.PonerNumero(2,1,1);
            matrizPares.PonerNumero(2,0,0);
            matrizPares.PonerNumero(2,2,2);
            matrizPares.Mostrar();
            var posiciones = matrizPares.ObtenerListaPosicionesNumero(2);
            foreach (var item in posiciones)
            {
                Console.WriteLine(item);
            }
        }

        public static void EjercicioF()
        {
            try
            {
                MatrizEnterosPares matrizPares = new MatrizEnterosPares();
                matrizPares.PonerNumero(4,0,0);
                matrizPares.PonerNumero(6,0,2);
                matrizPares.PonerNumero(2,1,1);
                matrizPares.PonerNumero(2,2,2);
                matrizPares.Mostrar();

                List<int> numerosRepetidos = matrizPares.NumerosRepetidos();
                Console.WriteLine("Los numeros repetidos son: ");
                foreach (var item in numerosRepetidos)
                {
                    Console.WriteLine(item);
                }
            }
            catch (System.Exception ex)
            {
                Console.WriteLine(ex.Message);
            }
        }

        public static void EjercicioF_v2()
        {
            try
            {
                MatrizEnterosPares matrizPares = new MatrizEnterosPares();
                matrizPares.PonerNumero(4,0,0);
                matrizPares.PonerNumero(6,0,2);
                matrizPares.PonerNumero(2,1,1);
                matrizPares.PonerNumero(2,2,2);
                matrizPares.Mostrar();

                List<int> numerosRepetidos = matrizPares.NumerosRepetidosConDiccionario();
                Console.WriteLine("Los numeros repetidos son: ");
                foreach (var item in numerosRepetidos)
                {
                    Console.WriteLine(item);
                }
            }
            catch (System.Exception ex)
            {
                Console.WriteLine(ex.Message);
            }
        }

        public static void PruebasEjercicioRepetods()
        {
                MatrizEnterosPares matrizPares = new MatrizEnterosPares();
                matrizPares.PonerNumero(4,0,0);
                matrizPares.PonerNumero(6,0,2);
                matrizPares.PonerNumero(2,1,1);
                matrizPares.PonerNumero(2,2,2);
                matrizPares.PruebaForEachMatriz();

        }


        static void Main(string[] args)
        {
            Console.WriteLine("Solucion pregunta 5 del examen...");
            EjercicioF();
            //EjercicioF_v2();
           // PruebasEjercicioRepetods();
            Console.ReadKey();        
        }
    }
}