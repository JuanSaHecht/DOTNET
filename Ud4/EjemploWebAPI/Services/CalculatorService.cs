using Model;

public class CalculatorService : ICalculatorService
{
    public int Factorial(int x)
    {
        return Model.Operations.Factorial(x);
    }
}