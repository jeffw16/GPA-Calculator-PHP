/**
 * MyWikis
 * GPA Calculator (in Java, for CLI uses)
 * @author Jeffrey Wang
 * @contributors CJ Duffee
 * @license GNU License 2.0
*/

import java.util.*;
import java.io.*;

public class GPACalculator {
  // instance variables
  double dividend = 0.0;
  double divisor = 0.0;
  
  // constructors
  public GPACalculator ( double dividend ) {
    this.dividend = dividend;
    this.divisor = 7.0;
  }
  public GPACalculator ( double dividend, double divisor ) {
    this.dividend = dividend;
    this.divisor = divisor;
  }
  
  // mutator methods
  public void setDividend ( double dividend ) {
    this.dividend = dividend;
  }
  public void setDivisor ( double divisor ) {
    this.divisor = divisor;
  }
  
  // accessor methods
  public double getDividend () {
    return dividend;
  }
  public double getDivisor () {
    return divisor;
  }
  
  // methods
  public void calculateGPA {
    // to be added soon
  }
}
