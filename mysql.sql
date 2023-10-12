

SELECT *
FROM USER
INNER JOIN user_profile ON user.id= user_profile.user_id
INNER JOIN country ON user_profile.country= country.id
INNER JOIN state ON user_profile.state= state.id
INNER JOIN city ON user_profile.city= city.id;


SELECT  user.id,user.name,user.mobile,user.email,user.salary,
  user_profile.address,user_profile.pincode,country.countryName

   FROM user_profile
                                        INNER JOIN state ON user_profile.state=state.id
                                        INNER JOIN country ON user_profile.country=country.id
                                        INNER JOIN city ON user_profile.city=city.id
                                        INNER JOIN USER ON user_profile.user_id=user.id;