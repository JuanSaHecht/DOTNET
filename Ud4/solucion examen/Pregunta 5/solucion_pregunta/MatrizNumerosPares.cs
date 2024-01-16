using System.Reflection.Metadata.Ecma335;

namespace examen
{
    public class MatrizEnterosPares
    {
        public const int ROWS = 3;
        public const int COLUMNS = 3;
        private int[,] _matriz;

        public MatrizEnterosPares()
        {
            this._matriz = new int[ROWS,COLUMNS];
            for (int i=0;i<3;i++)
            {
                for (int j=0;j<3;j++)
                {
                    this._matriz[i,j] = 0;
                }
            }
        }

        public void PonerNumero(int valor, int fila,int columna)
        {
            if (valor % 2==0)
            {
                this._matriz[fila,columna] = valor;
            }
            else
            {
                throw new ArgumentOutOfRangeException(nameof(valor),"El valor ha de ser par.");                
            }
        }

        public void Mostrar()
        {
            for (int i=0;i<ROWS;i++)
            {
                for (int j=0;j<COLUMNS;j++)
                {
                    Console.Write(this._matriz[i,j]); 
                }
                Console.WriteLine();
            }
        }

        public void PruebaForEachMatriz()
        {
            foreach (var n in this._matriz)
            {
                Console.WriteLine(n);
            }
        }

        public List<Posicion> ObtenerListaPosicionesNumero(int numero)
        {
            List<Posicion> res = new List<Posicion>();
            for (int i=0;i<ROWS;i++)
            {
                for (int j=0;j<COLUMNS;j++)
                {
                    if (_matriz[i,j]==numero)
                    {
                        res.Add(new Posicion(i,j));
                    }
                }
            }
            return res;
        }


        public bool ContainsListElement(List<int> list ,
                                        int element)
        {
            bool result = false;
            foreach (int item in list)
            {
                if (item==element)
                {
                    result = true;
                    break;
                }
            }

            return result;
        }


        public List<int> NumerosRepetidos() 
        {
            List<int> valores = new List<int>();
            List<int> repetidos = new List<int>();
            for (int i=0;i<ROWS;i++)
            {
                for (int j=0;j<COLUMNS;j++)
                { //0.5 se comprueba todo
                    int x = this._matriz[i,j];
                    //if (!valores.Contains(x)) Aquí se podría utilizar esto directamente...
                    if (!ContainsListElement(valores,x))
                        valores.Add(x);
                    else
                    {
                        //if (!repetidos.Contains(x)) Aquí se podría utilizar esto directamente...
                        if (!ContainsListElement(repetidos,x))
                        {
                            repetidos.Add(x);
                        }
                    }
                        
                }
            }
            return repetidos; 
        }
        public List<int> NumerosRepetidosConDiccionario()
        {
            Dictionary<int,int> frecuencia = new Dictionary<int, int>();
            List<int> repetidos = new List<int>();
            for (int i=0;i<ROWS;i++)
            {
                for (int j=0;j<COLUMNS;j++)
                {
                    int x = this._matriz[i,j];
                    if (frecuencia.ContainsKey(x))
                    {
                        frecuencia[x]++;
                    }
                    else
                    {
                        frecuencia[x] = 1;
                    }
                }
            }
            foreach (KeyValuePair<int, int> entry in frecuencia) 
            {
                Console.WriteLine(entry.Key + " : " + entry.Value);
                if (entry.Value>1)
                {
                    repetidos.Add(entry.Key);
                }
            }
            return repetidos;
        }

    }
}