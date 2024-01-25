using ChessAPI.Model;
using Microsoft.AspNetCore.Mvc;

namespace ChessAPI.Controllers;

[ApiController]
[Route("[controller]")]
public class MovementController : ControllerBase
{
    private IBoardService _movementService;

    public MovementController(IBoardService movementService)
    {
        this._movementService = movementService;
    }

    [HttpGet]
    public IActionResult Get(
        string boardStatus, int fromCol , int fromRow, int toCol, int toRow
        )
    {
        try
        {
            if (string.IsNullOrEmpty(boardStatus))
                return BadRequest("board no puede ser IsNullOrEmpty");

            var response = _movementService.GetMovementValidation(boardStatus, fromCol, fromRow, toCol, toRow);
            
            return Ok(response);
            
            
        

        }   
        catch (Exception ex)
        {   
            return StatusCode(StatusCodes.Status500InternalServerError);
        }     
    }
}
