public class BoardScore
{
    private string _test_dummy;
    public BoardScore(string test_dummy)
    {
        this.Test_dummy = test_dummy;
    }

    public string Test_dummy { get => _test_dummy; set => _test_dummy = value; }
}