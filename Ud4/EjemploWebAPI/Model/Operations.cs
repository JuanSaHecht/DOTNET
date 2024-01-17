namespace Model
{
    public class Operations
    {

        public static int Factorial(int x)
        {
            int res = -1;
            if (x==0)
                res = 1;
            else
            {
                if(x>0)
                {
                    res = x;
                    while (x>1)
                    {
                        res = res * (x - 1);
                        x--;
                    }
                }
                else
                {
                    throw new Exception("error");
                }
            }

            return res;
        }
    }
}