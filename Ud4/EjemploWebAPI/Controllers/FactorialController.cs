using Microsoft.AspNetCore.Mvc;
using Model;

namespace TodoApi.Controllers;

[ApiController]
[Route("[controller]")]
public class FactorialController : ControllerBase
{
    private ICalculatorService _calculatorService;

    public FactorialController(ICalculatorService calculatorService)
    {
        this._calculatorService = calculatorService;
    }

    [HttpGet]
    public IActionResult Get(int x)
    {
        try
        {
            if (x>=0)
            {
                OperationResult operationResult = new OperationResult();
                operationResult.Result = this._calculatorService.Factorial(x);
                return Ok(operationResult);
            }
            else
            {
                return BadRequest("x ha de ser mayor o igual a cero");
            }
        }   
        catch (Exception ex)
        {
            return StatusCode(StatusCodes.Status500InternalServerError);
        }     
    }
}


